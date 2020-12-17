<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


<div class="content">
    <div class="container">
        <form action="{{route('sendmail')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Enter Subject</label>
                <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
            </div>
            <div class="form-group">
                <label for="">Enter Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <b>Which you send ?</b><br>
                <div class="custom-control custom-radio">
                    <input type="radio" id="hr" name="role" value="hr" class="custom-control-input">
                    <label class="custom-control-label" for="hr">All HR</label>
                  </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="candidates" value="candidates" name="role" class="custom-control-input">
                    <label class="custom-control-label" for="candidates">All Candidates</label>
                  </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="hrcollapse" name="role" value="singlehr" class="custom-control-input"
                    data-toggle="collapse" data-parent="#hrcollpase">
                    <label class="custom-control-label" for="hrcollapse">HR</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="candidatecollapse" value="singlecandidates" name="role" class="custom-control-input"
                    data-toggle="collapse" data-parent="#candidatecollapse">
                    <label class="custom-control-label" for="candidatecollapse">Candidates</label>
                  </div>
            </div>
            <div class="form-group collapse" id="candidatecollapsepanel">
                <label>Choose Candidate</label>
                <select name="singlecandidates[]" id="" class="form-control" multiple>
                    @forelse ($candidates as $candidate)
                        <option value="{{$candidate->id}}">{{$candidate->name}}</option>
                    @empty
                        <option value="">No Found</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group collapse" id="hrcollpasepanel">
                <label>Choose HR</label>
                <select name="singlehr[]" id="" class="form-control" multiple>
                    @forelse ($hrs as $hr)
                <option value="{{$hr->id}}">{{$hr->name}}</option>
                    @empty
                        <option value="">No Found</option>
                    @endforelse
                </select>
            </div>
            <input type="submit" value="Send Email" class="btn btn-primary">
        </form>

    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$('#hrcollapse,#candidatecollapse,#hr,#candidates').on('click', function (e) {
    e.stopPropagation();
   
    if(this.id == 'hrcollapse'){
        $('#candidatecollapsepanel').collapse('hide');
        $('#hrcollpasepanel').collapse('show');
    }
    else if(this.id ==  'candidatecollapse'){
        $('#hrcollpasepanel').collapse('hide');
        $('#candidatecollapsepanel').collapse('show');
    }
    else if(this.id=='candidates'||this.id=='hr'){
        $('#hrcollpasepanel').collapse('hide');
        $('#candidatecollapsepanel').collapse('hide');
    }
  })
</script>
