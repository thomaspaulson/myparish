                    
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>$MetaTitle</h1>          
                    
            <% with $BirthCertificate %>
					
                        <div class="grid-x grid-padding-x">
                          <div class="large-3 cell">							
                            $Year<label for="$ID">Year</label>	
                            $RegNO<label for="$ID">Reg No</label>
                            $PageNO<label for="$ID">Page No</label>
                          </div>
                            <div class="large-9 cell">
                                <div class="grid-x grid-padding-x">
                                    <div class="large-9 cell">
                                    <div class="input-group">
                                        $Name  <span class="input-group-label">$Sex of </span>
                                    </div>
                                    <div class="input-group">
                                        $FathersName <span class="input-group-label">and</span> $MothersName
                                        <span class="input-group-label">legitimately</span><br>							
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label">married, of the Parish of </span> $Parish
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label">born  at</span> $Location
                                        <span class="input-group-label">on</span> $DOB.Format('d-m-Y')
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label text-right">was baptised (admitted to complete the baptismal rites on *)</span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label">at</span> $BaptisedAt
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label">on</span> $BaptisedDate.Format('d-m-Y')
                                        <span class="input-group-label">by Rev. Fr</span> $Priest
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label">Sponsors being </span> $GodFather
                                    </div>                                
                                    <div class="input-group">
                                        <span class="input-group-label">of the Parish of </span> $GodFatherParish
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label">and his $GodMotherRelation </span> $GodMother
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-label">of the Parish of </span> $GodMotherParish
                                    </div>

                                    <div class="input-group">                                    
                                        <% if  $PrivatelyBaptised %>                                    
                                        <span class="input-group-label">&nbsp;&nbsp; The Child being in danger of death was given Baptism privately</span>
                                        <% end_if %>
                                    </div>
                                    </div>
                                    <div class="large-3 cell">
                                        <h5>Confirmation</h5>
                                        <p class="subheader">Place<br>
                                           Date<br>  
                                           Ref no 
                                        </p>   
                                        <h5>Marriage</h5>
                                        <p class="subheader">Place<br>
                                           Date<br>  
                                           Ref no 
                                        </p>   
                                        
                                    </div>
                                 </div>    
                                
                            </div>																	
			</div><!-- div class="grid-x grid-padding-x" -->				
					
						
			<div class="grid-x grid-padding-x">
                        	<div class="large-12 cell">
                        	<ul class="menu">                        		
                        		<li><a href="birth/edit/$ID?BackURL=$Top.BackURL"  class="button">edit</a></li>
                        		<li><a href="birth/delete/$ID?BackURL=$Top.BackURL" class="button" onclick="return confirm('Are you sure?');">delete</a></li>
                        		<li><a href="birth/doprint/$ID" class="button" target="_blank">print</a></li>
                        	</ul>
                        </div>                    
                    </div>
                    
					<% end_with %>		<%-- with $DeathCertificate --%>                    
        </div>
      </div>
                
