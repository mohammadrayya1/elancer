<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css')?>">
    <title>Create Category</title>
</head>
<body>
            <div class="container">

                <h1> Edit Category</h1>

                <form action="/categories/<?=$categories->id?>}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="_method" value="put">
                    <div class="form-group mb-3">
                        <label  for ="name"  >Name:</label>
                        <input type="text" name="name" value="<?=$categories->name?>" id="name" class="form-control @error('name') is-invalid @enderror" >
                    </div>


                    <div class="form-group mb-3">
                        <label  for ="parent_id"  >parentID:</label>     <select name="parent_id" class="form-select" >
                            @foreach ($parants as $parent)
                                <option value="{{$parent->id}}" @if($parent->id==$categories->parent_id) selected  @endif>{{$parent->name}} </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group mb-3">
                        <label  for ="description"  >Description:</label>
                        <textarea name="description" value="<?=$categories->description?>"  class="form-control"></textarea>
                    </div>


                    <div class="form-group mb-3">
                        <label  for ="art_path"  >Image:</label>
                        <input type="file" name="art_path" id="image"  class="form-control" >
                    </div>


                    <div class="form-group mb-3">
                        <label  for ="status"  >Status:</label>
                        <div>
                            <label>
                                <input type="radio" name="status" value="active"
                                Active</label>
                            <label>
                                <input type="radio" name="status" value="inactive"   >
                                inActive</label>
                        </div>
                    </div>




                    <button type="submit"  class="btn btn-primary" >{{$button_labe ?? 'save'}}</button>
                    </form>

            </div>


</body>
</html>
