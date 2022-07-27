<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-info">
    <div class="col-lg-4 col-md-6 my-4 mx-auto">
        <form class="bg-white border p-4" action="<?=site_url()?>" method="POST">
            <div class="form-group mb-4 ">
                <label for="url" class="form-label">Website url:</label>
                <input type="url" id="url" class="form-control" name="url" placeholder="https://example.com" value="<?=(isset($url)?$url:'')?>">
            </div>
            <div class="form-group mb-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="optionType" id="png" value="png" checked>
                    <label class="form-check-label" for="png">screenshot</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="optionType" id="pdf" value="pdf">
                    <label class="form-check-label" for="pdf">pdf</label>
                </div>
            </div>

            <input class="btn btn-primary" type="submit" value="submit">
        </form>
        <div class="my-4">
            <?php if(isset($res)) { ?>
                <h3>Generated Output:</h3>
                <?php if($type === 'png') {?>
                    <img class="img-fluid border" src="<?=base_url('screenshots/'.$res)?>" > 
                <?php } else { ?>
                    <iframe class="border" src="<?=base_url('pdfs/'.$res);?>" width="100%" height="600px">
                <?php } ?>
            <?php }?>
            <?php if(isset($error)) { echo $error; }?>
        </div>

    </div>

   
</body>
</html>