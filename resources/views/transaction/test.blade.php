<thead>
    <tr>
        <th>Unit</th>
        <th>Kuantiti</th>
        <th>Status</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($barangKeluar as $brk )
    <tr>
        <td>{{ $brk->pegawai->name }}</td>
        <td>{{ $brk->total_item }}</td>
        <td>{{ $brk->status }}</td>
        <td>{{ \Carbon\Carbon::parse($brk->created_at)->format('d-m-Y') }}</td>
        <td>
            <a href="{{ route('item.detailbrk', $brk->code) }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-eye me-1"></i>Detail
            </a>
        </td>
    </tr>
    @endforeach
</tbody>
