myApp.component('primeiro', {
  bindings: { primeiro: '<' },
  
  template: '<div class="flex-h">' + 
            '  <div class="primeiro">' +
            '    <h3>Some primeiro:</h3>' +
            '    <ul>' +
            '      <li ng-repeat="link1 in $ctrl.link1">' +
            '        <a ui-sref-active="active" ui-sref="user.primeiro({ primeiroId: primeiro.link })">' +
            '          {{primeiro.linkname}}' +
            '        </a>' +
            '      </li>' +
            '    </ul>' + 
            '  </div>' +
            '  <ui-view></ui-view>' +
            '</div>'
});