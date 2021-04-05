<div class="app-container" ng-app="dateTimeApp" ng-controller="dateTimeCtrl as ctrl" ng-cloak>


        <div date-picker
           datepicker-title="Select a date and time slot"
           picktime="true"
           pickdate="true"
           pickpast="false"
           mondayfirst="false"
           custom-message="You have selected"
           selecteddate="ctrl.selected_date"
           updatefn="ctrl.updateDate(newdate)">

          <div class="datepicker"
             ng-class="{
              'am': timeframe == 'am',
              'pm': timeframe == 'pm',
              'compact': compact
            }">
            <div class="datepicker-header">
              <div class="datepicker-title" ng-if="datepicker_title">{{ datepickerTitle }}</div>
              <div class="datepicker-subheader" id="dateSubheader"></div>
            </div>
            <div class="" id=""><!---->
              <div class="calendar-header">
                <div class="goback" ng-click="moveBack()" ng-if="pickdate">
                  <svg width="30" height="30">
                    <path fill="none" stroke="#0DAD83" stroke-width="3" d="M19,6 l-9,9 l9,9"/>
                  </svg>
                </div>
                <div class="current-month-container">{{ currentViewDate.getFullYear() }} {{ currentMonthName() }}</div>
                <div class="goforward" ng-click="moveForward()" ng-if="pickdate">
                  <svg width="30" height="30">
                    <path fill="none" stroke="#0DAD83" stroke-width="3" d="M11,6 l9,9 l-9,9" />
                  </svg>
                </div>
              </div>
              <div class="calendar-day-header">
                <span ng-repeat="day in days" class="day-label">{{ day.short }}</span>
              </div>
              <div class="calendar-grid" ng-class="{false: 'no-hover'}[pickdate]">
                <div
                  ng-class="{'no-hover': !day.showday}"
                  ng-repeat="day in month"
                  class="datecontainer"
                  ng-style="{'margin-left': calcOffset(day, $index)}"
                  track by $index>
                  <div class="datenumber" ng-class="{'day-selected': day.selected }" ng-click="selectDate(day)">
                    {{ day.daydate }}
                  </div>
                </div>
              </div>
              </select>
              <div id="display_div">
  
                <div class="radio-toolbar" id="radioslots">
                 <input type="radio" id="radio910" name="timeslot" value="9" >
                  <label for="radio910" onclick="newSlot('9')">9AM-10AM</label>

                  <input type="radio" id="radio1011" name="timeslot" value="10">
                  <label for="radio1011" onclick="newSlot('10')">10AM-11AM</label>

                  <input type="radio" id="radio1112" name="timeslot" value="11">
                  <label for="radio1112" onclick="newSlot('11')">11AM-12PM</label>

                  <input type="radio" id="radio12" name="timeslot" value="1">
                  <label for="radio12" onclick="newSlot('1')">1PM-2PM</label>

                  <input type="radio" id="radio23" name="timeslot" value="2">
                  <label for="radio23" onclick="newSlot('2')">2PM-3PM</label>

                  <input type="radio" id="radio34" name="timeslot" value="3">
                  <label for="radio34" onclick="newSlot('3')">3PM-4PM</label>
              </div>
            </div>
            <div class="timeline">
            </div>
          </div>
        </div>
      </div>
    </div>