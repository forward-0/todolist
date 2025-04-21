<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست انجام کارها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="todo-header m-3">
                <h4 class="mb-3">لیست انجام کار ها</h4>
            </div>

            <div class="card-body">
                <form class="input-group mb-5" action="{{ route('task.store') }}" method="post">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="افزودن کار جدید">
                    <input type="date" name="date" class="form-control">
                    <button type="submit" class="btn btn-primary">اضافه</button>
                </form>



                <div class="row">
                    <!-- ستون کارهای انجام شده -->
                    <div class="col-md-4 mb-3">
                        <div class="status-column">
                            <h5 class="mb-3 text-center">کار های انجام شده</h5>

                            @foreach ($tasks as $task)

                            @if ($task->status==3)

                            <div class="card task-item mb-2">
                                <div class="card-body">
                                    <a href="{{ route('task.delete',[$task->id]) }}"><button class="btn btn-danger float-start">حذف</button></a>

                                    <span class="ms-2">{{$task->name}}</span>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- ستون کارهای در حال انجام -->
                    <div class="col-md-4 mb-3">
                        <div class="status-column">
                            <h5 class="mb-3 text-center">کار های در حال انجام</h5>
                            @foreach ($tasks as $task)

                            @if ($task->status==2)

                            <div class="card task-item mb-2">
                                <div class="card-body">
                                    <a href="{{ route('task.delete',[$task->id]) }}"><button class="btn btn-danger float-start">حذف</button></a>
                                    <a href="{{ route('task.status',[$task->id]) }}"><button class="btn btn-success float-start ms-2">انجام شده</button></a>

                                    <span class="ms-2">{{$task->name}}</span>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- ستون کارهای انجام نشده -->
                    <div class="col-md-4 mb-3">
                        <div class="status-column">
                            <h5 class="mb-3 text-center">کار های انجام نشده</h5>





                            @foreach ($tasks as $task)

                            @if ($task->status==1)

                            <div class="card task-item mb-2">
                                <div class="card-body">
                                    <a href="{{ route('task.delete',[$task->id]) }}"><button class="btn btn-danger float-start">حذف</button></a>
                                    <a href="{{ route('task.status',[$task->id]) }}"><button class="btn btn-success float-start ms-2"> در حال انجام</button></a>

                                    <span class="ms-2">{{$task->name}}</span>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
