@extends('contacts.template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'un Contact</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="field is-grouped is-horizontal">
                        <label class="label field-label">Pays</label>
                        <div class="select is-multiple">
                            <select name="country_id" >
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="label field-label">Villes</label>
                        <div class="select is-multiple">
                            <select name="city_id" >
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                            <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Nom du contact">
                        </div>
                        @error('nom')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror


                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input @error('email') is-danger @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="Email du contact">
                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror



                        <label class="label">Job</label>
                        <div class="control">
                            <input class="input @error('job_title') is-danger @enderror" type="text" name="job_title" value="{{ old('job_title') }}" placeholder="Job du contact">
                        </div>
                        @error('job_title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
