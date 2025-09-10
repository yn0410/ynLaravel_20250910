<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 載入bs5 css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    {{-- hello student index ok --}}
    <div class="container mt-3">
        <h2>Student index</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
        <div class="text-end">
            {{-- <button class="btn btn-success">add</button> --}}
            {{-- <a href="http://localhost/students/create" class="btn btn-success">add</a> --}}
            <a href="{{ route('students.create') }}" class="btn btn-success">add</a>
            <a href="{{ route('students.create') }}" class="btn btn-primary">excel</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>option</th>
                </tr>
            </thead>
            <tbody>
                {{-- blade --}}
                @foreach ($data as $value)
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>
                            <a href="{{ route('students.edit', ['student' => $value['id']]) }}" class="btn btn-warning">edit</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>



    <!-- 載入bs5 bundle js (有bundle才是完整版) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
        integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- 載入jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            // jQuery methods go here...
        });
    </script>
</body>

</html>
