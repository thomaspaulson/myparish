
      <div class="grid-x grid-padding-x">
        <div class="large-3 cell">
          <h1>Birth</h1>
          $SearchForm
        </div>
        <div class="large-9 cell">    
          
            <% include Toolbar %>						
            <% if $PaginatedList %>                
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>DOB</th>						
                        <th>Father</th>
                        <th></th>		
                    </tr>
                    </thead>
                    <tbody>
                        <% loop $PaginatedList %>
                        <tr>
                            <td>$Counter</td>
                            <td>$Name</td>
                            <td>$Top.Date($DOB,'d-m-Y') / $Top.Age($DOB)</td>									
                            <td>$FathersName</td>
                            <td>
                                    <ul class="menu small">
                                            <li><a href="birth/view/$ID?&BackURL=$Top.RequestedURL" title="view"><i class="fi-page"></i></a></li>
                                            <li><a href="birth/edit/$ID?&BackURL=$Top.RequestedURL" title="edit"><i class="fi-page-edit"></i></a></li>
                                            <li><a href="birth/delete/$ID?&BackURL=$Top.RequestedURL"  title="delete" onclick="return confirm('Are you sure?');"><i class="fi-page-delete"></i></a></li>
                                            <!--<li><a href="birth/doprint/$ID?&BackURL=$Top.RequestedURL" target="_blank"><i class="fi-print"></i></a></li>-->
                                    </ul>
                            </td>
                        </tr>
                        <% end_loop %>
                    </tbody>
                </table>
                <% include Pagination Items=$PaginatedList %>
                <% include PaginationResult  Items=$PaginatedList %>
            <% else %>
                    <p>No records found</p>
            <% end_if %>
          
          
        </div>        
      </div>

