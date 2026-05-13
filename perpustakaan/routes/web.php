<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\OrderItem;

// ================= REGISTER =================
Route::get('/register', function () {
    return view('page.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'nama'     => 'required',
        'email'    => 'required|email|unique:users',
        'telepon'  => 'nullable',
        'alamat'   => 'nullable',
        'password' => 'required|confirmed|min:6',
    ]);
    $user = User::create([
        'name'     => $request->nama,
        'email'    => $request->email,
        'telepon'  => $request->telepon,
        'alamat'   => $request->alamat,
        'role'     => 'user',
        'password' => Hash::make($request->password),
    ]);
    Auth::login($user);
    return redirect('/');
});

// ================= LOGIN =================
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->isSuperAdmin()) return redirect('/superadmin/dashboard');
        elseif ($user->isAdmin())  return redirect('/admin/dashboard');
        else                       return redirect('/');
    }
    return back()->with('error', 'Email atau password salah');
})->name('login.process');

// ================= LOGOUT =================
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ================= HOME =================
Route::get('/', function (Request $request) {
    $search  = $request->get('search');
    $results = null;
    if ($search) {
        $results = Buku::where('judul', 'like', "%{$search}%")
                       ->orWhere('penulis', 'like', "%{$search}%")
                       ->get();
    }
    return view('home', compact('search', 'results'));
});

// ================= CATALOG =================
Route::get('/catalog', function () {
    $fiction    = Buku::where('kategori_id', 1)->get();
    $nonfiction = Buku::where('kategori_id', 2)->get();
    $harry      = Buku::where('kategori_id', 3)->get();
    $dilan      = Buku::where('kategori_id', 4)->get();
    return view('page.catalog', compact('fiction', 'nonfiction', 'harry', 'dilan'));
});

// ================= DETAIL =================
Route::get('/detail/{id}', function ($id) {
    $book = Buku::findOrFail($id);
    return view('page.detail', compact('book'));
});

// ================= CART =================
Route::get('/cart', function () {
    return view('page.cart');
})->name('cart');

Route::post('/add-to-cart/{id}', function ($id) {
    $book = Buku::findOrFail($id);
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'id'       => $book->id,
            'judul'    => $book->judul,
            'harga'    => $book->harga,
            'gambar'   => $book->gambar,
            'quantity' => 1,
        ];
    }
    session()->put('cart', $cart);
    return back()->with('success', 'Buku berhasil ditambahkan ke cart');
});

Route::post('/remove-cart/{id}', function ($id) {
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return back()->with('success', 'Buku berhasil dihapus dari cart');
});

Route::post('/buy-now/{id}', function ($id) {
    session()->put('buy_now', $id);
    return redirect('/checkout');
});

// ================= CHECKOUT =================
Route::get('/checkout', function () {
    $cart  = session()->get('cart', []);
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['harga'] * $item['quantity'];
    }
    return view('page.checkout', compact('cart', 'total'));
});

Route::post('/process-payment', function (Request $request) {
    $method = $request->payment_method;
    if ($method == 'bank') return redirect('/payment/bank');
    if ($method == 'cod')  return redirect('/payment/cod');
    return back();
});

// ================= PAYMENT — simpan order di sini =================
Route::get('/payment/bank', function () {
    $cart  = session()->get('cart', []);
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['harga'] * $item['quantity'];
    }
    return view('page.payment-bank', compact('total'));
});

Route::get('/payment/cod', function () {
    $cart  = session()->get('cart', []);
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['harga'] * $item['quantity'];
    }
    return view('page.payment-cod', compact('total'));
});

// Route ini dipanggil saat user klik OK/Selesai di halaman payment
Route::post('/confirm-order', function (Request $request) {
    if (!Auth::check()) return redirect('/login');

    $cart = session()->get('cart', []);
    if (empty($cart)) return redirect('/');

    $total = collect($cart)->sum(fn($i) => $i['harga'] * $i['quantity']);

    $order = Order::create([
        'user_id'        => Auth::id(),
        'total'          => $total,
        'payment_method' => $request->payment_method ?? 'bank',
        'status'         => 'pending',
    ]);

    foreach ($cart as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'buku_id'  => $item['id'],
            'quantity' => $item['quantity'],
            'price'    => $item['harga'],
        ]);
    }

    session()->forget('cart');

    return redirect('/user/pesanan')->with('success', 'Pesanan berhasil dibuat! Menunggu konfirmasi admin.');
})->name('confirm.order');


/*
|--------------------------------------------------------------------------
| USER PROFILE ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('user')->group(function () {

    Route::get('/akun', function () {
        return view('user.akun');
    });

    Route::put('/akun', function (Request $request) {
        $user = Auth::user();
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
        ]);
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'telepon' => $request->telepon,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return back()->with('success', 'Profil berhasil diperbarui');
    });

    // Pesanan aktif
    Route::get('/pesanan', function () {
        $orders = Order::where('user_id', Auth::id())
                       ->whereIn('status', ['pending', 'diproses', 'dikirim'])
                       ->with(['items.buku'])
                       ->latest()
                       ->get();
        return view('user.pesanan', compact('orders'));
    });

    // Riwayat selesai/dibatalkan
    Route::get('/riwayat', function () {
        $orders = Order::where('user_id', Auth::id())
                       ->whereIn('status', ['selesai', 'dibatalkan'])
                       ->with(['items.buku'])
                       ->latest()
                       ->get();
        return view('user.riwayat', compact('orders'));
    });

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/dashboard', function () {
        $totalBuku     = Buku::count();
        $totalKategori = Kategori::count();
        $totalUser     = User::count();
        $totalPesanan  = Order::count();
        return view('admin.dashboard', compact('totalBuku', 'totalKategori', 'totalUser', 'totalPesanan'));
    })->name('admin.dashboard');

    // CRUD Buku
    Route::get('/buku',           [\App\Http\Controllers\AdminBukuController::class, 'index'])->name('admin.buku.index');
    Route::get('/buku/create',    [\App\Http\Controllers\AdminBukuController::class, 'create'])->name('admin.buku.create');
    Route::post('/buku',          [\App\Http\Controllers\AdminBukuController::class, 'store'])->name('admin.buku.store');
    Route::get('/buku/{id}/edit', [\App\Http\Controllers\AdminBukuController::class, 'edit'])->name('admin.buku.edit');
    Route::put('/buku/{id}',      [\App\Http\Controllers\AdminBukuController::class, 'update'])->name('admin.buku.update');
    Route::delete('/buku/{id}',   [\App\Http\Controllers\AdminBukuController::class, 'destroy'])->name('admin.buku.destroy');

    // CRUD Kategori
    Route::get('/kategori',           [\App\Http\Controllers\AdminKategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori/create',    [\App\Http\Controllers\AdminKategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori',          [\App\Http\Controllers\AdminKategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/{id}/edit', [\App\Http\Controllers\AdminKategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/kategori/{id}',      [\App\Http\Controllers\AdminKategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/{id}',   [\App\Http\Controllers\AdminKategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    // KELOLA PESANAN — hanya admin
    Route::get('/orders', function () {
        $orders = Order::with(['user', 'items.buku'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    })->name('admin.orders.index');

    Route::put('/orders/{id}/status', function (Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status pesanan berhasil diperbarui');
    })->name('admin.orders.status');

});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('superadmin')->middleware('superadmin')->group(function () {

    Route::get('/dashboard', function () {
        $totalBuku     = Buku::count();
        $totalKategori = Kategori::count();
        $totalUser     = User::count();
        $totalAdmin    = User::where('role', 'admin')->count();
        return view('superadmin.dashboard', compact('totalBuku', 'totalKategori', 'totalUser', 'totalAdmin'));
    })->name('superadmin.dashboard');

    Route::get('/users',           [\App\Http\Controllers\SuperAdminUserController::class, 'index'])->name('superadmin.users.index');
    Route::get('/users/create',    [\App\Http\Controllers\SuperAdminUserController::class, 'create'])->name('superadmin.users.create');
    Route::post('/users',          [\App\Http\Controllers\SuperAdminUserController::class, 'store'])->name('superadmin.users.store');
    Route::get('/users/{id}/edit', [\App\Http\Controllers\SuperAdminUserController::class, 'edit'])->name('superadmin.users.edit');
    Route::put('/users/{id}',      [\App\Http\Controllers\SuperAdminUserController::class, 'update'])->name('superadmin.users.update');
    Route::delete('/users/{id}',   [\App\Http\Controllers\SuperAdminUserController::class, 'destroy'])->name('superadmin.users.destroy');

    Route::get('/buku',           [\App\Http\Controllers\AdminBukuController::class, 'index']);
    Route::get('/buku/create',    [\App\Http\Controllers\AdminBukuController::class, 'create']);
    Route::post('/buku',          [\App\Http\Controllers\AdminBukuController::class, 'store']);
    Route::get('/buku/{id}/edit', [\App\Http\Controllers\AdminBukuController::class, 'edit']);
    Route::put('/buku/{id}',      [\App\Http\Controllers\AdminBukuController::class, 'update']);
    Route::delete('/buku/{id}',   [\App\Http\Controllers\AdminBukuController::class, 'destroy']);

    Route::get('/kategori',           [\App\Http\Controllers\AdminKategoriController::class, 'index']);
    Route::get('/kategori/create',    [\App\Http\Controllers\AdminKategoriController::class, 'create']);
    Route::post('/kategori',          [\App\Http\Controllers\AdminKategoriController::class, 'store']);
    Route::get('/kategori/{id}/edit', [\App\Http\Controllers\AdminKategoriController::class, 'edit']);
    Route::put('/kategori/{id}',      [\App\Http\Controllers\AdminKategoriController::class, 'update']);
    Route::delete('/kategori/{id}',   [\App\Http\Controllers\AdminKategoriController::class, 'destroy']);

});