<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container card p-2 mt-4">
    <div class="card-title mb-3 bg-info-subtle p-2">
        <h3 class="text-center ">Project and Bids Details</h3>
    </div>
    
    <div class="table-responsive card-body">
    <form action="/api/filter" method="post" class="mb-4">
            @csrf
    <div class="row">
        
        <div class="col-md-4">
            <label for="" class="form-label fw-bold">Select DeadLine</label>
            <input type="date" name="deadline" id="" class="form-control" >
        </div>
        <div class="col-md-4">
        <label for="" class="form-check">&nbsp;</label>
                <button type="submit" class="btn btn-primary" >Filter</button>
        </div>
         
    </div>
    </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Location</th>
                    <th>Estimated Value</th>
                    <th>Bid Deadline</th>
                    <th>Lowest Bid</th>
                    <th>Total Bids</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->location }}</td>
                        <td>{{ $project->estimated_value }}</td>
                        <td>{{ $project->deadline }}</td>
                        <td>{{ $project->lowest_bid }}</td>
                        <td>{{ $project->total_bids }}</td>
                        <td><a href="/api/store/{{ $project->id}}" class="btn btn-info">Add Bids</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $projects->links() }}  
        </div>
    </div>
</div>

</body>
</html>
