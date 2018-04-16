<div class="inline-block relative w-full">
    <select name="country" class="is-input-full" v-model="form.country">
        <!-- Countries often selected by users can be moved to the top of the list. -->
        <!-- Countries known to be subject to general US embargo are commented out by default. -->
        <!-- The data-countryCode attribute is populated with ISO country code, and value is int'l calling code. -->

        <option data-countryCode="NO" value="NO" selected>Norge (+47)</option>
        <option data-countryCode="DK" value="DK">Danmark (+45)</option>
        <option data-countryCode="SE" value="SE">Sverige (+46)</option>
        <option data-countryCode="FI" value="FI">Finland (+358)</option>
        <option data-countryCode="GB" value="GB">England (+44)</option>

        <option disabled="disabled">Andre land</option>
        <option data-countryCode="AR" value="AR">Argentina (+54)</option>
        <option data-countryCode="AU" value="AU">Australia (+61)</option>
        <option data-countryCode="AT" value="AT">Austria (+43)</option>>
        <option data-countryCode="BE" value="BE">Belgium (+32)</option>
        <option data-countryCode="BA" value="BA">Bosnia Herzegovina (+387)</option>
        <option data-countryCode="BG" value="BG">Bulgaria (+359)</option>
        <option data-countryCode="CA" value="CA">Canada (+1)</option>
        <option data-countryCode="HR" value="HR">Croatia (+385)</option>
        <option data-countryCode="CZ" value="CZ">Czech Republic (+420)</option>
        <option data-countryCode="EG" value="EK">Egypt (+20)</option>
        <option data-countryCode="FK" value="FK">Falkland Islands (+500)</option>
        <option data-countryCode="FO" value="FO">Faroe Islands (+298)</option>
        <option data-countryCode="FR" value="FR">France (+33)</option>
        <option data-countryCode="GE" value="GE">Georgia (+7880)</option>
        <option data-countryCode="DE" value="DE">Germany (+49)</option>
        <option data-countryCode="GR" value="GR">Greece (+30)</option>
        <option data-countryCode="GL" value="GL">Greenland (+299)</option>
        <option data-countryCode="HU" value="HU">Hungary (+36)</option>
        <option data-countryCode="IS" value="IS">Iceland (+354)</option>
        <option data-countryCode="IE" value="IE">Ireland (+353)</option>
        <option data-countryCode="IL" value="IL">Israel (+972)</option>
        <option data-countryCode="IT" value="IT">Italy (+39)</option>
        <option data-countryCode="LV" value="LV">Latvia (+371)</option>
        <option data-countryCode="LI" value="LI">Liechtenstein (+417)</option>
        <option data-countryCode="LT" value="LT">Lithuania (+370)</option>
        <option data-countryCode="LU" value="LU">Luxembourg (+352)</option>
        <option data-countryCode="MT" value="MT">Malta (+356)</option>
        <option data-countryCode="NL" value="NL">Netherlands (+31)</option>
        <option data-countryCode="NZ" value="NZ">New Zealand (+64)</option>
        <option data-countryCode="PL" value="PL">Poland (+48)</option>
        <option data-countryCode="PT" value="PT">Portugal (+351)</option>
        <option data-countryCode="RO" value="RO">Romania (+40)</option>
        <option data-countryCode="RU" value="RU">Russia (+7)</option>
        <option data-countryCode="CS" value="CS">Serbia (+381)</option>
        <option data-countryCode="SK" value="SK">Slovak Republic (+421)</option>
        <option data-countryCode="SI" value="SI">Slovenia (+386)</option>
        <option data-countryCode="ES" value="ES">Spain (+34)</option>
        <option data-countryCode="CH" value="CH">Switzerland (+41)</option>
        <option data-countryCode="UA" value="UA">Ukraine (+380)</option>
        <option data-countryCode="US" value="US">USA (+1)</option>
    </select>
    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>
</div>