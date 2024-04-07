<div class="offcanvas offcanvas-start" id="sidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Filters</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="left-accordion">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                    
                    <form action="home.php" method="POST">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Manufacturer
                            </button>
                        </h2>


                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <select class="rounded-0"  id="manufacturer">
                                    <option value="">Select Manufacturer</option>
                                    <option value="manufacturer1">gulfstream</option>
                                    <option value="manufacturer2">Manufacturer 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Price
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" id="price" placeholder="Enter maximum price">
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Seating capacity
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" placeholder="Enter number of seats">
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                year
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" placeholder="Enter year">

                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                               Mach
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" placeholder="Enter speed">
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                engines
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" placeholder="Enter engines">
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Mainimum Take Off Weight
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" placeholder="minimum Take off Weight">
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Add more filter options as needed -->
                    <div class="d-flex mt-3">
                        <button type="button" class="btn btn-secondary w-100 d-inline-block me-2" id="Reset">Reset</button>
                        <button type="submit" class="btn btn-primary w-100 d-inline-block" id="Apply">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
    aria-controls="sidebar">
    Filters
</button>