<form action="add.php" method="post" enctype="multipart/form-data">
                        <h2>Basic</h2>
                        <div class="form-group">
                            <label for="year">Year:</label>
                            <input type="number" id="year" name="year" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="manufacturer">Manufacturer:</label>
                            <input type="text" id="manufacturer" name="manufacturer" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" id="model" name="model" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="engines">Engine count:</label>
                            <input type="number" id="engines_count" name="engines_count" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="capacity">Capacity:</label>
                            <input type="number" id="capacity" name="capacity" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="maximumTakeoffWeight">price:</label>
                            <input type="number" id="price" name="price" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="cockpitFeatures">Cockpit Features:</label>
                            <input type="text" name="cockpitFeatures[]" class="form-control" required>
                            <input type="text" name="cockpitFeatures[]" class="form-control" required>
                        </div>
                        <h2>Performance</h2>
                        <div class="form-group">
                            <label for="maximumRange">Maximum Range:</label>
                            <input type="text" id="maximumRange" name="maximumRange" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="highSpeedCruise">High-Speed Cruise:</label>
                            <input type="text" id="highSpeedCruise" name="highSpeedCruise" class="form-control"
                                required>
                        </div><br>
                        <div class="form-group">
                            <label for="longRangeCruise">Long-Range Cruise:</label>
                            <input type="text" id="longRangeCruise" name="longRangeCruise" class="form-control"
                                required>
                        </div><br>
                        <div class="form-group">
                            <label for="maximumOperatingMach">Maximum Operating Mach:</label>
                            <input type="text" id="maximumOperatingMach" name="maximumOperatingMach"
                                class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="takeoffDistance">Takeoff Distance:</label>
                            <input type="text" id="takeoffDistance" name="takeoffDistance" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="initialCruiseAltitude">Initial Cruise Altitude:</label>
                            <input type="text" id="initialCruiseAltitude" name="initialCruiseAltitude" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="maximumCruiseAltitude">Maximum Cruise Altitude:</label>
                            <input type="text" id="maximumCruiseAltitude" name="maximumCruiseAltitude" required
                                class="form-control">
                        </div><br>

                        <!-- Weights Section -->
                        <h2>Weights</h2>
                        <div class="form-group">
                            <label for="maximumTakeoffWeight">Maximum Takeoff Weight:</label>
                            <input type="number" id="maximumTakeoffWeight" name="maximumTakeoffWeight" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="maximumLandingWeight">Maximum Landing Weight:</label>
                            <input type="number" id="maximumLandingWeight" name="maximumLandingWeight" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="maximumZeroFuelWeight">Maximum Zero Fuel Weight:</label>
                            <input type="number" id="maximumZeroFuelWeight" name="maximumZeroFuelWeight" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="basicOperatingWeight">Basic Operating Weight (including 4 crew):</label>
                            <input type="number" id="basicOperatingWeight" name="basicOperatingWeight" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="maximumPayload">Maximum Payload:</label>
                            <input type="number" id="maximumPayload" name="maximumPayload" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="maximumPayloadFullFuel">Maximum Payload/Full Fuel:</label>
                            <input type="number" id="maximumPayloadFullFuel" name="maximumPayloadFullFuel" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="maximumFuel">Maximum Fuel:</label>
                            <input type="number" id="maximumFuel" name="maximumFuel" required class="form-control">
                        </div><br>

                        <!-- Systems Section -->
                        <h2>Systems</h2>
                        <div class="form-group">
                            <label for="avionics">Avionics:</label>
                            <input type="text" id="avionics" name="avionics" required class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="engines">Engines:</label>
                            <input type="text" id="engines" name="engines" required class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="ratedTakeoffThrust">Rated Takeoff Thrust (each):</label>
                            <input type="number" id="ratedTakeoffThrust" name="ratedTakeoffThrust" required
                                class="form-control">
                        </div>

                        <!-- Measurements Section -->
                        <h2>Measurements</h2>
                        <div class="form-group">
                            <label for="finishedCabinHeight">Finished Cabin Height:</label>
                            <input type="text" id="finishedCabinHeight" name="finishedCabinHeight" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="finishedCabinWidth">Finished Cabin Width:</label>
                            <input type="text" id="finishedCabinWidth" name="finishedCabinWidth" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="cabinLength">Cabin Length (excluding baggage):</label>
                            <input type="text" id="cabinLength" name="cabinLength" required class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="totalInteriorLength">Total Interior Length:</label>
                            <input type="text" id="totalInteriorLength" name="totalInteriorLength" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="cabinVolume">Cabin Volume:</label>
                            <input type="text" id="cabinVolume" name="cabinVolume" required class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="baggageCompartmentVolume">Baggage Compartment Volume:</label>
                            <input type="text" id="baggageCompartmentVolume" name="baggageCompartmentVolume" required
                                class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="exteriorHeight">Exterior Height:</label>
                            <input type="text" id="exteriorHeight" name="exteriorHeight" required class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="exteriorLength">Exterior Length:</label>
                            <input type="text" id="exteriorLength" name="exteriorLength" required class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="overallWingspan">Overall Wingspan:</label>
                            <input type="text" id="overallWingspan" name="overallWingspan" required
                                class="form-control">
                        </div><br><br>

                        <!-- Image Upload Section -->
                        <h2>Upload Image</h2>
                        <div class="form-group">
                            <label for="image">Upload Image:</label>
                            <input type="file" id="image" name="image" class="form-control-file" required>
                        </div><br>


                        <!-- Submit Button -->
                        <input type="submit" name="Submit-Aircraft" value="Submit" class="btn btn-primary">
                    </form>