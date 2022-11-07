@extends('Master-Page.Layout')


@section('title')
    Add Brief
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
                    <span class="material-icons">new_label</span>&nbsp;Add Brief
                </div>
                <div class="card-body">
                    @if (Session::has('Brief_created'))
                        <div class="alert alert-success">
                            {{ Session::get('Brief_created') }}
                        </div>
                    @endif
                    <form action="{{ route('brief.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nom_du_brief">Brief's Name</label>
                            <input type="text" name="nom_du_brief" id="nom_du_brief" class="form-control">
                        </div>
                        @error('nom_du_brief')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Date_heure_livraison">Date_heure_livraison</label>
                            <input type="datetime-local" name="Date_heure_livraison" id="Date_heure_livraison" class="form-control">
                        </div>
                        @error('Date_heure_livraison')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Date_heure_recuperation">Date_heure_recuperation</label>
                            <input type="datetime-local" name="Date_heure_recuperation" id="Date_heure_recuperation" class="form-control">
                        </div>
                        @error('Date_heure_recuperation')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn mt-3 btn-primary w-100">Send</button>
                        <a href="{{ route('brief.get') }}" class="btn btn-dark w-100 mt-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
@endsection
