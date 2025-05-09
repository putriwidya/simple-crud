<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Blogs - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="border-0 rounded shadow card">
                    <div class="card-body">
                    <a href="{{ route('kecamatan.create') }}" class="mb-3 btn btn-md btn-success">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama Kecamatan</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              @forelse ($dt as $row)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kode }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                    <form action="{{ route('kecamatan.status') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$row->id}}" />
                                            <input type="checkbox" value="1" name="status" onchange="this.form.submit()" {{ ($row->status)?'checked':'' }}> 
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kecamatan.destroy', $row->id) }}" method="POST">
                                            <a href="{{ route('kecamatan.edit', $row->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>

                                    
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Blog belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $dt->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>