
          




              <table>
                    <thead>
                        <td><b>id</b></td>
                        <td><b>Technology</b></td>
                        
                    </thead>
                    <tbody>
                @if($tech)
                        <tr>
                            @foreach($tech as $pro) 
                        <td> {{ $pro['id'] }}</td>
                       <td>{{$pro['technology'] }}</td>
          
        </tr>
          @endforeach 
                @endif



                    </tbody>
                  </table>


               






