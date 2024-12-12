<div wire:poll.3000ms>
    {{-- In work, do what you enjoy. --}}
    <div class="table responsive table-hover text-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">BMI</th>
                    <th scope = "col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{ $student->bmi ? $student->bmi->bmi : 'N/A' }}</td>
                    <td>{{ $student->bmi ? $student->bmi->result : 'N/A' }}</td>
                    <td>
                        <button class="btn btn-primary">Diet Plan and Activities</button>
                    </td> 
                </tr>
                @endforeach
                {{$students->links()}}
            </tbody>
        </table>
    </div>
</div>
