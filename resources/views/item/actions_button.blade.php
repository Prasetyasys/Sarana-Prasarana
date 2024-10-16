<div class="btn-group text-center" role="group" aria-label="item actions">
    <a href="" class="btn btn-success"><i class="bi bi-eye"></i></a>
    <a href="{{ route('item.edit', $i->code) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
    <a href="{{ route('item.destroy', $i->code) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
    {{-- <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button> --}}
    {{-- <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-none" id="formDelete{{ $item->id }}">
        @csrf
        @method('DELETE')
    </form> --}}
</div>
