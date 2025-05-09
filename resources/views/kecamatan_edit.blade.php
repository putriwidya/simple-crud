<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Blog - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="border-0 rounded shadow card">
                    <div class="card-body">
                        <form action="{{ route('kecamatan.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                          

                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$kecamatan->id}}" />
                                <label class="font-weight-bold">Kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode', $kecamatan->kode) }}" placeholder="Masukkan kode">

                                <label class="font-weight-bold">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $kecamatan->name) }}" placeholder="Masukkan name">

                                <label class="font-weight-bold">Provinsi</label>
                                <select name="T_PROVINSI" class="form-control">
                                    @foreach($prov as $row)
                                    <option value="{{$row->id}}" {{($kecamatan->T_PROVINSI == $row->id)?'selected':''}}>{{$row->kode}} - {{$row->name}}</option>
                                    @endforeach
                                </select>
                                
                                <div class="form-group">
                                    <label class="font-weight-bold">Status</label><br/>
                                    <label><input type="checkbox" name="status" {{($kecamatan->status)?'checked':''}}> Aktif</label>
                                </div>
                                
                                <!-- error message untuk title -->
                                @error('kode')
                                    <div class="mt-2 alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('name')
                                    <div class="mt-2 alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>