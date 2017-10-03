      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>$MetaTitle</h1>          
                    
			<% with $MarriageCertificate %>
                        <div class="grid-x grid-padding-x">
                          <div class="large-3 cell">							
                            $Year<label for="$ID">Year</label>	
                            $RegNO<label for="$ID">Reg No</label>
                          </div>
                            <div class="large-9 cell">
                                <div class="input-group">
                                    $GroomName (Groom)
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">son of </span>
                                    $GroomFather
                                    <span class="input-group-label">and </span>
                                    $GroomMother
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">of the Parish of </span>
                                    $GroomParish
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">born  at</span>
                                    $GroomBornAt
                                    <span class="input-group-label">on</span>
                                    $GroomDOB.Format('d-m-Y')
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">and baptised  at</span>
                                    $GroomBaptisedAt
                                    <span class="input-group-label">on</span>
                                    GroomBaptised.Format('d-m-Y')
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">  &nbsp; &nbsp; And </span>
                                    $BrideName (Bride)
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">daughter of </span>
                                    $BrideFather
                                    <span class="input-group-label">and </span>
                                    $BrideMother
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">of the Parish of </span>
                                    $BrideParish
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">born  at</span>
                                    $BrideBornAt
                                    <span class="input-group-label">on</span>
                                    $BrideDOB.Format('d-m-Y')
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">and baptised  at</span>
                                    $BrideBaptisedAt
                                    <span class="input-group-label">on</span>
                                    BrideBaptised.Format('d-m-Y')
                                </div>

                                
                                <div class="input-group">
                                    <span class="input-group-label">having been ascertained of the free state and of the absence of  canonical</span>
                                </div>                                
                                <div class="input-group">
                                    <span class="input-group-label"> impediments, were married at this </span>                                    
                                    $Parish    
                                    <span class="input-group-label">on </span>
                                    $DOMarriage.Format('d-m-Y')
                                </div>                                
                                <div class="input-group">
                                    <span class="input-group-label">blessed by Rev. Fr  </span>
                                    $Priest
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">being parish Priest / with delegation of the Parish Priest, and </span>
                                </div>                                
                                
                                <div class="input-group">
                                    <span class="input-group-label">witness by 1)  </span>
                                    $Witness1
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">of the parish of  </span>
                                    $Witness1Parish
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">and witness 2)  </span>
                                    $Witness2
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-label">of the parish of  </span>
                                    $Witness2Parish
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
                                
                                <div class="grid-x grid-padding-x">
                                    <div class="large-12 cell">
                                    <ul class="menu">                        		
                                            <li><a href="marriage/edit/$ID?BackURL=$Top.BackURL"  class="button">edit</a></li>
                                            <li><a href="marriage/delete/$ID?BackURL=$Top.BackURL" class="button" onclick="return confirm('Are you sure?');">delete</a></li>
                                            <li><a href="marriage/doprint/$ID" class="button" target="_blank">print</a></li>
                                    </ul>
                                    </div>                    
                                </div>
                                
                            </div>																	
                    </div><!-- div class="grid-x grid-padding-x" -->
					
                    <% end_with %>		<%-- with $MarriageCertificate --%>						


        </div>
      </div>

                