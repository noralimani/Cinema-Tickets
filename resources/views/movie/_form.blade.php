<div class="card-body">
    <x-input name="title" label="Title" :value="$movie->title"></x-input>
    <x-input name="image" type="file" label="Image" :value="$movie->image"></x-input>
    <x-input name="director" label="Director" :value="$movie->director"></x-input>
    <x-input name="age" type="number" label="Age" :value="$movie->age"></x-input>
    <x-input name="year" type="date" label="Year" :value="$movie->year"></x-input>
    <x-input name="release_date" type="date" label="Release Date" :value="$movie->release_date">
    </x-input>
    <x-input name="price" type="number" label="Price" :value="$movie->price"></x-input>
    <div>
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description">
                        {{ $movie->description }}
                       </textarea>
    </div>
</div>
<div class="card-footer d-flex justify-content-between">
    <a href="{{ url()->previous() }}" class="card-link">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
