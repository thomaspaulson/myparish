
      <div class="grid-x grid-padding-x">
        <div class="large-3 cell">
          <h1>Marriage</h1>
          $SearchForm
        </div>
        <div class="large-9 cell">
          
          
            <% include Toolbar %>						
            <% if $PaginatedList %>                
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Bride</th>
                        <th>Groom</th>						
                        <th>Married on</th>
                        <th></th>		
                    </tr>
                    </thead>
                    <tbody>
                        <% loop $PaginatedList %>
                        <tr>
                            <td></td>
                            <td>$GroomName</td>
                            <td>$BrideName</td>
                            <td>$Top.Date($DOMarriage,'d-m-Y')</td>									
                            <td>
                                <ul class="menu small">
                                    <li><a href="marriage/view/$ID?&BackURL=$Top.RequestedURL" title="view"><i class="fi-page"></i></a></li>
                                    <li><a href="marriage/edit/$ID?&BackURL=$Top.RequestedURL" title="edit"><i class="fi-page-edit"></i></a></li>
                                    <li><a href="marriage/delete/$ID?&BackURL=$Top.RequestedURL"  title="delete" onclick="return confirm('Are you sure?');"><i class="fi-page-delete"></i></a></li>
                                    <!--<li><a href="marriage/doprint/$ID?&BackURL=$Top.RequestedURL" target="_blank"><i class="fi-print"></i></a></li>-->
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

