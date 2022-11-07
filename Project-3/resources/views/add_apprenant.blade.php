@extends('Master-Page.Layout')


@section('title')
    Add Apprenant
@endsection


@section('style')
    form {

    }
    .form-content {
    display:flex;
    justify-content: center;
    align-items: center;
    }
    .form-content label {
    margin-right: 15px;
    }
    .card-header {
        display:flex;
    }
@endsection



@section('content')
    <div class="row my-5 pt-5">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <span class="material-icons">new_label</span>&nbsp;Add Apprenant
                </div>
                <div class="card-body">
                    @if (Session::has('apprenant_created'))
                        <div class="alert alert-success">
                            {{ Session::get('apprenant_created') }}
                        </div>
                    @endif
                    <form action="{{ route('apprenant.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" id="prenom" class="form-control">
                        </div>
                        @error('prenom')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="nom">nom</label>
                            <input type="text" name="nom" id="nom" class="form-control">
                        </div>
                        @error('nom')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="id_promotion">Promotion's Number</label>
                            <input type="text" name="id_promotion" id="id_promotion" class="form-control">
                        </div>
                        @error('id_promotion')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn mt-3 btn-primary w-100">Send</button>
                        <a href="{{ route('promotion.get') }}" class="btn btn-dark w-100 mt-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
@endsection
