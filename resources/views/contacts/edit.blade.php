@extends('contacts.template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un contact</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field is-grouped is-horizontal">
                        <label class="label field-label">Pays</label>
                        <div class="select is-multiple">
                            <select name="country_id">
                                <option value="{{ $contact->country->id }}">{{ $contact->country->name }}</option>
                                @foreach($country as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="label field-label">Ville</label>
                        <div class="select is-multiple">
                            <select name="city_id" >
                                <option value="{{ $contact->city->id }}">{{ $contact->city->name }}</option>
                            @foreach($city as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                            <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ $contact->name }}" placeholder="Nom du contact">
                        </div>
                        @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror


                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input @error('email') is-danger @enderror" type="text" name="email" value="{{ $contact->email }}" placeholder="Email du contact">
                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror



                        <label class="label">Job</label>
                        <div class="control">
                            <input class="input @error('job_title') is-danger @enderror" type="text" name="job_title" value="{{ $contact->job_title }}" placeholder="Job du contact">
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
