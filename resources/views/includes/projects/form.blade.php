@if ($project->exists)
    {{-- form di modifica --}}
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype='multipart/form-data' novalidate>
        @method('PUT')
    @else
        {{-- form di creazione --}}
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype='multipart/form-data' novalidate>
@endif

@csrf
<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror"
                id="name" name="name" placeholder="Inserisci il nome del progetto"
                value="{{ old('name', $project->name) }}" maxlength="50" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" disabled
                value="{{ Str::slug(old('name', $project->name), '-') }}">
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid  @elseif(old('content')) is-valid @enderror"
                id="content" name="content" rows="10" required>{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-11">
        <div class="mb-3">
            <label for="image" class="form-label">Url dell'immagine</label>
            <input type="file"
                class="form-control @error('image') is-invalid  @elseif(old('image')) is-valid @enderror"
                id="image" name="image" placeholder="Insersisci un url valido">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-1">
        <img src="{{ old('image', $project->image ?? 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=') }}"
            alt="preview" class="img-fluid my-2" id="image-preview">
    </div>
    <hr>
    <div class="d-flex justify-content-end mt-2">
        <button class="btn btn-success">
            <i class="fas fa-floppy-disk me-2"></i>Salva
        </button>
    </div>
</div>
</form>
