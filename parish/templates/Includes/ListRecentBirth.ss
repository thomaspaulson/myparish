                <h3>Birth / <small><a href="$AddLink">Add</a></small></h3> 
                <% if $RecentBrith %>
				<table>
					<thead>
						<tr>
						<th>#</th><th>Name</th><th>DOB</th><th>Father</th><th width="15%"></th>		
					</tr>
					</thead>
					<tbody>
                        <% loop $RecentBrith %>
                            <tr>
                                <td>#</td><td>$Name</td><td>$DOB.Format('d-m-Y') / $Age($DOB)</td><td>$FathersName</td>							
                                <td>
                                    <ul class="menu small">
                                        <li><a href="birth/view/$ID" title="view"><i class="fi-page"></i></a></li>
                                        <li><a href="birth/edit/$ID" title="edit"><i class="fi-page-edit"></i></a></li>
                                        <li><a href="birth/delete/$ID"  title="delete" onclick="return confirm('Are you sure?');"><i class="fi-page-delete"></i></a></li>
                                        <!--<li><a href="birth/doprint/7?&BackURL=http%3A%2F%2Fmyparish.localhost%2Fbirth" target="_blank"><i class="fi-print"></i></a></li>-->
                                    </ul>
                                </td>
                            </tr>                       
                        <% end_loop %>
					</tbody>
				</table>					    	
                <% end_if %>