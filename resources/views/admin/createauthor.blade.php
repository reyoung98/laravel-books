<h1>Add new author</h1>

<form action="{{route('author.store') }}" method="post">
    @csrf
    <label for="name">Author name</label>
    <input type="text" name="name" id="">
    <label for="slug">Slug</label>
    <input type="text" name="slug" id="">
    <label for="bio">Bio</label>
    <input type="text" name="bio" id="">
    <button type="submit">Save</button>
</form>