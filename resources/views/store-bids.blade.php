<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Bids</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container card p-2 mt-4">
        <div class="card-title mb-3 bg-info-subtle p-2">
            <h3 class="text-center">Create Bids for Specific Project</h3>
        </div>
        <div class="row mb-3">
            <div class="col-md-"><a href="/api/project" class="btn btn-info">Go Back</a></div>
        </div>
        <form id="bidForm">
            <div class="card-body">
                <div id="spinner"></div>
          
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label fw-bold">Company Name</label><span class="text-danger"> *</span>
                        <input type="text" name="company_name" id="company" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label fw-bold">Bid Amount</label><span class="text-danger"> *</span>
                        <input type="text" name="bid_amount" id="amount" class="form-control" required>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label fw-bold">Bid Date</label><span class="text-danger"> *</span>
                        <input type="datetime-local" name="bid_date" id="date" id="" class="form-control" required value="<?= date('Y-m-dH:m:s') ?>">
                    </div>

                </div><br>
                <div class="row">
                    <div class="col text-center">
                        <button type="button" id="submit" class="btn btn-success" style="width:200px">Create Bid</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      $('#bidForm').on('click', '#submit', function () {
    const company = $('#company').val();
    const amount = $('#amount').val();
    const date = $('#date').val();

    
    const currentUrl = window.location.href;
    const id = currentUrl.split('/').pop();

    $.ajax({
        url: `/api/store`, 
        method: 'POST',
        data: {
            id:id,
            company_name: company,
            bid_amount: amount,
            bid_date: date,
        },
        success: function (response) {
            alert(response.message); 
           
            $('#bidForm')[0].reset();
        },
        error: function (xhr) {
            
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (const key in errors) {
                    errorMessages += `${errors[key][0]}\n`;
                }
                alert(errorMessages);
            } else {
                alert('An unexpected error occurred.');
            }
        },
    });
});

    </script>

</body>

</html>