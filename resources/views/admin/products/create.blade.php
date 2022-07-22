@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="">Inserisci un nuovo prodotto</h2>
    <p class="fst-italic ">I campi contrassegnati con * sono obbligatori</p>
    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- NOME --}}
        <div class="mb-3">
            <label for="name" class="form-label text-dark">Nome prodotto *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Inserisci il titolo">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- DESCRIZIONE --}}
        <div class="mb-3">
            <label for="description" class="form-label text-dark @error('description') is-invalid @enderror">Descrizione
                prodotto</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            @error('description')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- CATEGORIA --}}
        <div class="mb-3">
            <label for="category" class="form-label text-dark">Categoria *</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                <option value="">Selezione la categoria</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- IMAGE --}}
        <div class="form-group">
            <img id="uploadPreview" width="75"
                src="https://cdn.discordapp.com/attachments/943126356932317214/998530366459621497/1231032-200.png">
            <label for="image" class="text-dark">Aggiungi immagine</label>
            <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
            {{-- @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
        </div>

        {{-- PRICE --}}
        <div class="form-group mb-3">
            <label for="price" class="form-label text-dark @error('price') is-invalid @enderror">Prezzo *</label>
            <input type="number" step="0.10" class="form-control" id="price" name="price" min='1' max='999.90'
                aria-describedby="price" placeholder="Es: 2.90">
            @error('price')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- TAGS --}}
        {{-- <div class="mb-3">
            <div class="form-group">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                <div class="form-check-inline">
                    <input type="checkbox" class="form-check-input" {{in_array($tag->id, old("tags", [])) ? 'checked' :
                    '' }}
                    id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
                    <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                </div>
                @endforeach
            </div>
        </div> --}}

        {{-- VISIBLE --}}
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" {{old('visible') ? 'checked' : '' }} id="visible"
                name="visible">
            <label class="form-check-label text-dark" for="visible">Visibile</label>
        </div>

        {{-- BOTTONE --}}
        <button type="submit" class="btn btn_main">Crea</button>
    </form>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
@endsection

<style>
    .nicEdit-main {
        background-color: white;
    }

    .form-check-input:checked {
        background-color: #042940 !important;
    }

    #image::-webkit-file-upload-button {
        background-color: #DBF227;
        margin: 0 10px;
        border: 0;
        color: #005C53;
        border-radius: 3px;
        font-size: 1.1rem;
        padding: 6px 10px;
        cursor: pointer;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        text-transform: uppercase;
    }

    #image::-webkit-file-upload-button:hover {
        background-color: #005C53;
        border: 0px;
        color: white;
        border-radius: 3px;
        font-size: 1.1rem;
        padding: 6px 10px;
        cursor: pointer;
    }
</style>