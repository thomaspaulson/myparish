                    
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>$MetaTitle</h1>          
                    
            <% with $DeathCertificate %>

                <div class="grid-x grid-padding-x">
                  <div class="large-3 cell">
                        $Year<label for="$ID">Year</label>	
                        $RegNO<label for="$ID">Reg No</label>
                  </div>
                <div class="large-9 cell">
                    <div class="input-group">
                        <span class="input-group-label">In the year of Our Lord</span>
                        $DOD.Format('Y')
                        <span class="input-group-label">in the</span>
                    </div>                              
                    <div class="input-group">
                        <span class="input-group-label">month of</span>
                        $Top.Month($DOD.Format('m')) 
                        <span class="input-group-label">on the </span>
                        $DOD.Format('d')
                        <span class="input-group-label">day of the month, at</span>
                        $DOD.Format('h:i')
                        <span class="input-group-label">am/pm</span>                                    							
                    </div>
                    <div class="input-group">
                        <span class="input-group-label">died</span>
                        $Name
                    </div>

                    <div class="input-group">
                        <span class="input-group-label">aged </span>
                        $Age
                        <span class="input-group-label">son/daugther of </span>
                        $FathersName
                        <span class="input-group-label">and </span>
                        $MothersName
                    </div>
                    <div class="input-group">
                        <span class="input-group-label">( and spouse of/of the late </span>
                        $SpouseName
                        <span class="input-group-label">), of the</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-label text-right">Parish of</span>
                        $Parish
                    </div>
                    <div class="input-group">
                        <span class="input-group-label">in communion with The Holy Catholic Church (outside communion with</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-label">The Holy Catholic Church) having received the Sacrament of Penance, the Holy</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-label">Viaticum and the Anointing of the Sick from Rev Fr </span>
                        $Priest
                    </div>    
                    <div class="input-group">                                                                 
                        <span class="input-group-label">(not having received the Sacraments</span>
                    </div>

                    <div class="input-group">
                        <span class="input-group-label">of The Holy Catholic Church) and was buried with / without esslesiastical</span>
                    </div>                                
                    <div class="input-group">
                        <span class="input-group-label">rites and with / without solemenity at the cemetery  of</span>
                        $Cemetery
                    </div>

                    <div class="input-group">
                        <span class="input-group-label">on the  </span>
                        $BuriedDate.Format('d')
                        <span class="input-group-label">day of the month of </span>
                        $Top.Month($BuriedDate.Format('m'))
                        <span class="input-group-label">, year </span>
                        $BuriedDate.Format('Y')
                    </div>


                    <div class="grid-x grid-padding-x">
                        <div class="large-4 cell">
                            <div class="input-group">
                            <span class="input-group-label">Place </span>
                            $Place
                            </div>					
                            <div class="input-group">
                            <span class="input-group-label">Date </span>
                             $Date.Format('d-m-Y')
                            </div>			
                        </div>								
                        <div class="large-8 cell">									 																																				                                <div class="input-group">
                            <span class="input-group-label">Parish Priest </span>
                            $ParishPriest
                            </div>					
                         </div>																		
                    </div>                    
                </div>																	
                </div><!-- div class="grid-x grid-padding-x" -->

						
        	<div class="grid-x grid-padding-x">
                    <div class="large-12 cell">
                    <ul class="menu">                        		
                            <li><a href="death/edit/$ID?BackURL=$Top.BackURL"  class="button">edit</a></li>
                            <li><a href="death/delete/$ID?BackURL=$Top.BackURL" class="button" onclick="return confirm('Are you sure?');">delete</a></li>
                            <li><a href="death/doprint/$ID" class="button" target="_blank">print</a></li>
                    </ul>
                    </div>                    
                </div>
                    
            <% end_with %>		<%-- with $BirthCertificate --%>                    
        </div>
      </div>
                
