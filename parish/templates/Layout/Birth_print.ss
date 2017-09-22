                    
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>$MetaTitle</h1>          
                    
					<% with $BirthCertificate %>
                        <div class="grid-x grid-padding-x">
                          <div class="large-3 cell">							
								$Year<label for="$ID">Year</label>	
								$RegNO<label for="$ID">Reg No</label>
                          </div>
                            <div class="large-9 cell">
                              <div class="input-group">
                              		$Name  <span class="input-group-label">son/daugther of </span>
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
                                    <span class="input-group-label">and his Wife/Sister/Mother </span> $GodMother
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label">of the Parish of </span> $GodMotherParish
                                </div>
                                
                            </div>																	
						</div><!-- div class="grid-x grid-padding-x" -->
					
						<div class="grid-x grid-padding-x">
							<div class="large-4 cell"> 																																		
							</div>									
							<div class="large-4 cell"> 																																		
							</div>																		
						</div>          
						
						

                    
					<% end_with %>		<%-- with $BirthCertificate --%>                    
        </div>
      </div>
                
