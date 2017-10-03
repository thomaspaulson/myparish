                <% if $IncludeFormTag %>
                <form $AttributesHTML>
                <% end_if %>
                <% if $Message %>
                    <p id="{$FormName}_error" class="message $MessageType">$Message</p>
                <% else %>
                    <p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
                <% end_if %>

                <fieldset>
                    <% if $Legend %><legend>$Legend</legend><% end_if %>                    
        		<% with $FieldMap %>
                        <div class="grid-x grid-padding-x">
                          <div class="large-3 cell">							
                            <% with $Year %>
                                <label for="$ID">$Title</label>$Field
                            <% end_with %>
                            <% with $RegNO %>
                                <label for="$ID">$Title</label>$Field
                            <% end_with %>
                            <% with $PageNO %>
                                <label for="$ID">$Title</label>$Field
                            <% end_with %>
                            
                          </div>
                          <div class="large-9 cell">
                                <div class="input-group">
                              		<span class="input-group-label">In the year of Our Lord</span>
                                    <% with YearOD %>
                                        $addExtraClass('input-group-field').Field
                                    <% end_with %>
                                    <span class="input-group-label">in the</span>
                                </div>
                              
                                <div class="input-group">
                                    <span class="input-group-label">month of</span>
                                    <% with MonthOD %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">on the </span>
                                    <% with DateOD %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">day of the month, at</span>
                                    <% with TimeOD %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">&nbsp;</span>                                    							
                                    <% with TimeStamp %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                              <div class="input-group">
                              		<span class="input-group-label">died</span>
                                    <% with Name %>
                                        $addExtraClass('input-group-field').Field
                                    <% end_with %>                                    
                              </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">aged </span>
                                    <% with Age %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label"> </span>
                                    <% with Gender %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                    <span class="input-group-label"> of </span>
                                    <% with FathersName %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">and </span>                                    
                                    <% with MothersName %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                                                        
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">( and spouse of/of the late </span>
                                    <% with SpouseName %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">), of the</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label text-right">Parish of</span>
                                    <% with Parish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">in communion with The Holy Catholic Church (outside communion with</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">The Holy Catholic Church) having received the Sacrament of Penance, the Holy</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">Viaticum and the Anointing of the Sick from Rev Fr </span>
                                    <% with Priest %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>       
                                </div>    
                                <div class="input-group">                                                                 
                                    <span class="input-group-label">(not having received the Sacraments</span>
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">of The Holy Catholic Church) and was buried</span>
                                    <% with $Ecclesiatical %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>   
                                    <span class="input-group-label">esslesiastical</span>
                                </div>                                
                                <div class="input-group">
                                    <span class="input-group-label">rites and </span>
                                    <% with $Solemnity %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                               
                                    <span class="input-group-label">solemnity at the cemetery  of</span>
                                    <% with Cemetery %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>       
                                </div>

                                <div class="input-group">
                                    <span class="input-group-label">on the  </span>
                                    <% with DateBuried %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">day of the month of </span>
                                    <% with MonthBuried %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">, year </span>
                                    <% with YearBuried %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>

                                <div class="input-group">
                                    <span class="input-group-label">The cause of death was</span>
                                    <% with DeathCause %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>       
                                </div>    
                              

                                <div class="grid-x grid-padding-x">
                                    <div class="large-4 cell">
                                        <div class="input-group">
                                            <span class="input-group-label">Place </span>
                                            <% with $Place %>
                                                $addExtraClass('input-group-field')
                                            <% end_with %>
                                        </div>					
                                        <div class="input-group">
                                            <span class="input-group-label">Date </span>
                                            <% with $Date %>
                                                $addExtraClass('input-group-field')
                                            <% end_with %>
                                        </div>		

                                    </div>								
                                    <div class="large-8 cell">									 																																				                                <div class="input-group">
                                            <span class="input-group-label">Parish Priest </span>
                                            <% with $ParishPriest %>
                                                $addExtraClass('input-group-field')
                                            <% end_with %>
                                    </div>
                                </div>		
                                    
                                    </div>                                                    
                                </div>																	
                            </div><!-- div class="grid-x grid-padding-x" -->
					
                    <% end_with %>		<%-- with $FieldMap --%>						

                    $Fields.fieldByName('RedirectURL')
                    $Fields.fieldByName('SecurityID')
                    $Fields.fieldByName('FamilyID')					

                    <% if $Fields.fieldByName('ID')	%>
                            $Fields.fieldByName('ID')						
                    <% end_if %>

                    <div class="grid-x grid-padding-x">
                    <% if $Actions %>
                        <div class="Actions">
                            <div class="large-12 cell">
                            <% loop $Actions %>
				$addExtraClass('button')                                
                            <% end_loop %>
                            </div>
                        </div>
                    <% end_if %>
                    </div>
                    </fieldset>
                <% if $IncludeFormTag %>
                </form>
                <% end_if %>
