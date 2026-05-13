@extends('admin.layouts.app')
@section('title', 'Kelola Pesanan')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-bag-check me-2"></i>Kelola Pesanan</h5>
        <span class="badge bg-light text-dark">{{ $orders->count() }} pesanan</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Total</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td class="text-muted small align-middle">{{ $order->id }}</td>
                        <td class="align-middle">
                            <div class="fw-semibold small">{{ $order->user->name ?? '-' }}</div>
                            <div class="text-muted" style="font-size:0.75rem;">{{ $order->user->email ?? '' }}</div>
                        </td>
                        <td class="align-middle">
                            @foreach($order->items as $item)
                            <div class="small">
                                {{ $item->buku->judul ?? 'Buku' }}
                                <span class="text-muted">x{{ $item->quantity }}</span>
                            </div>
                            @endforeach
                        </td>
                        <td class="fw-semibold small align-middle">
                            Rp{{ number_format($order->total,0,',','.') }}
                        </td>
                        <td class="align-middle">
                            <span class="badge bg-info">{{ strtoupper($order->payment_method) }}</span>
                        </td>
                        <td class="align-middle">
                            <span class="badge
                                @if($order->status=='pending')    bg-secondary
                                @elseif($order->status=='diproses') bg-primary
                                @elseif($order->status=='dikirim')  bg-warning
                                @elseif($order->status=='selesai')  bg-success
                                @else bg-danger @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="small text-muted align-middle">
                            {{ $order->created_at->format('d/m/Y') }}
                        </td>
                        <td class="align-middle">
                            <form action="/admin/orders/{{ $order->id }}/status" method="POST"
                                  class="d-flex gap-1 align-items-center">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm" style="width:110px; font-size:0.78rem;">
                                    <option value="pending"    {{ $order->status=='pending'    ? 'selected':'' }}>Pending</option>
                                    <option value="diproses"   {{ $order->status=='diproses'   ? 'selected':'' }}>Diproses</option>
                                    <option value="dikirim"    {{ $order->status=='dikirim'    ? 'selected':'' }}>Dikirim</option>
                                    <option value="selesai"    {{ $order->status=='selesai'    ? 'selected':'' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $order->status=='dibatalkan' ? 'selected':'' }}>Dibatalkan</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-action">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-5">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection