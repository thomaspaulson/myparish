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
								$Field<label for="$ID">$Title</label>
							<% end_with %>
							
							<% with $RegNO %>
								$Field<label for="$ID">$Title</label>
							<% end_with %>
                          </div>
                            <div class="large-9 cell">
                              <div class="input-group">
                                    <% with Name %>
                                        $addExtraClass('input-group-field').Field
                                    <% end_with %>
                                    <span class="input-group-label">son/daugther of </span>
                                </div>
                                <div class="input-group">
                                    <% with $FathersName %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">and </span>
                                    <% with $MothersName %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">legitimately</span><br>							
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">married, of the Parish of </span>
                                    <% with $Parish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">born  at</span>
                                    <% with $Location %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">on</span>
                                    <% with $DOB %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label text-right">was baptised (admitted to complete the baptismal rites on *)</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">at</span>
                                    <% with $BaptisedAt %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">on</span>
                                    <% with $BaptisedDate %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">by Rev. Fr</span>
                                    <% with $Priest %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">Sponsors being </span>
                                    <% with $GodFather %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>                                
                                <div class="input-group">
                                    <span class="input-group-label">of the Parish of </span>
                                    <% with $GodFatherParish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">and his Wife/Sister/Mother </span>
                                    <% with $GodMother %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">of the Parish of </span>
                                    <% with $GodMotherParish %>
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
					
						<div class="grid-x grid-padding-x">
							<div class="large-4 cell"> 																																		
							</div>									
							<div class="large-4 cell"> 																																		
							</div>																		
						</div>                    
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
