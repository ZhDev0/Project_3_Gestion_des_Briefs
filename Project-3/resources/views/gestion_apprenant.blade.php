@extends('Master-Page.Layout')


@section('title')
    Apprenant Page
@endsection


@section('style')
* {
    margin:0;
    padding:0;
    box-sizing:border-box;
}
    {{-- Global Styles  --}}

    a {
    text-decoration: none;
    }
    li {
    list-style: none;
    }

    {{-- Main Style  --}}
    nav ul{
    display:flex;
    justify-content: center;
    align-items: center;
    }
    nav ul li {
    margin: 0 15px;
    }
    nav ul li:last-child {
    width: 100px;
    }
    .middle-nav {
    display:flex;
    justify-content: space-around;
    align-items: center;
    {{-- background: yellow; --}}
    }
    main .main-content {
        display:flex;
        justify-content: center;
        align-items:center;
        padding: 10px 0;
        transition: 0.3s;
    }
    main .main-content:hover {
        background: #eee;
    }
    .main-content a {
        margin-left: 25px;
    }
    .update-promotion-name {
        display:flex;
        justify-content: center;
    }
    .assigned-briefs {
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .update-promotion-name {
        display:flex;
        justify-content:center;
        align-items:center;
    }
@endsection



@section('content')
    <div class="row my-4">
        <div class="col-md-12">
            <nav>
                <h1 class="d-flex justify-content-center align-items-center">Modifier Promotion</h1>
                <div class="update-promotion-name">
                    <h4>Nom De La Promotion&nbsp&nbsp&nbsp</h4>
                    <input type="text" class="text-primary" placeholder="Promotion X">
                    <a href="#" class="text-success">&nbsp&nbspModifier</a>
                </div>
                <br>
                <div class="assigned-briefs d-flex justify-content-center align-items-center">
                    <h4>Briefs assignes a la promotion&nbsp&nbsp&nbsp</h4>
                    <h5 class="text-primary">Briefs 2&nbsp&nbsp&nbsp</h5>
                    <h5 class="text-primary">Briefs 3</h5>
                </div>
            </nav>
            <div class="middle-nav">
                <ul>
                    <li><a href="{{ route('apprenant.add') }}" class="btn btn-primary mt-3">Ajouter Apprenant</a></li>
                </ul>
                <form action="" method="POST">
                    <input type="text" class="form-control" placeholder="Chercher Promotion">
                </form>
            </div>
            <main>
                @foreach ($apprenant as $value)
                    <div class="main-content">
                        <div class="text-dark">{{ $value->prenom . " " . $value->nom }}</div>
                        <a href="" class="text-danger">Supprimer</a>
                        <a href="" class="text-success">Modifier</a>
                    </div>
                @endforeach
            </main>
        </div>
    </div>
    {{-- <div class="d-flex flex-column justify-content-center align-items-center"> --}}
        {{ $apprenant->links() }}
        <a href="{{ route('promotion.get') }}" class="text-success d-flex justify-content-center align-items-center mt-5">Retourner</a>
    {{-- </div> --}}
@endsection



@section('script')
@endsection
