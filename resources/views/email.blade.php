
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <h2>Send Email </h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{route('email.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" name="body" placeholder="Body" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Send Email" class="btn btn-success"/>
                </div>
            </form>
        </div>
        <div class="cold-md-8">
            <div id="calendar"></div>
        </div>
    </div>
</div>
