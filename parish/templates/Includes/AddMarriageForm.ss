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
                                    <% with GroomName %>
                                        $addExtraClass('input-group-field').Field
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">son of </span>
                                    <% with GroomFather %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">and </span>
                                    <% with GroomMother %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    						
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">of the Parish of </span>
                                    <% with GroomParish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">born  at</span>
                                    <% with GroomBornAt %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">on</span>
                                    <% with GroomDOB %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">and baptised  at</span>
                                    <% with GroomBaptisedAt %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">on</span>
                                    <% with GroomBaptised %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">  &nbsp; &nbsp; And </span>
                                    <% with BrideName %>
                                        $addExtraClass('input-group-field').Field
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">daughter of </span>
                                    <% with BrideFather %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">and </span>
                                    <% with BrideMother %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    						
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">of the Parish of </span>
                                    <% with BrideParish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">born  at</span>
                                    <% with BrideBornAt %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">on</span>
                                    <% with BrideDOB %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">and baptised  at</span>
                                    <% with BrideBaptisedAt %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">on</span>
                                    <% with BrideBaptised %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>

                                
                                <div class="input-group">
                                    <span class="input-group-label">having been ascertained of the free state and of the absence of  canonical</span>
                                </div>                                
                                <div class="input-group">
                                    <span class="input-group-label"> impediments, were married at this </span>                                    
                                    <% with Parish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                    <span class="input-group-label">on </span>
                                    <% with DOMarriage %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>                                    
                                </div>                                
                                <div class="input-group">
                                    <span class="input-group-label">blessed by Rev. Fr  </span>
                                    <% with $Priest %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">being parish Priest / with delegation of the Parish Priest, and </span>
                                </div>                                
                                
                                <div class="input-group">
                                    <span class="input-group-label">witness by 1)  </span>
                                    <% with $Witness1 %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">of the parish of  </span>
                                    <% with Witness1Parish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">and witness 2)  </span>
                                    <% with $Witness2 %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">of the parish of  </span>
                                    <% with $Witness2Parish %>
                                        $addExtraClass('input-group-field')
                                    <% end_with %>
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">Remarks  </span>
                                    <% with $Remarks %>
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