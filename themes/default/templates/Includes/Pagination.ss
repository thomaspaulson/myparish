<% with $Items %>
    <% if $MoreThanOnePage %>

        <ul class="pagination"  role="navigation" aria-label="Pagination">
            <% if $PrevLink %><li><a href="$PrevLink">&laquo;</a></li><% end_if %>

            <% loop $PaginationSummary(4) %>
                <% if $CurrentBool %>
                    <li class="current"><span>$PageNum</span></li>
                <% else_if $Link %>
                    <li><a href="$Link">$PageNum</a></li>
                <% else %>
                    <li class="disabled"><span>&hellip;</span></li>
                <% end_if %>
            <% end_loop %>

            <% if $NextLink %><li><a href="$NextLink">&raquo;</a></li><% end_if %>
        </ul>

    <% end_if %>
<% end_with %>
