import { put } from 'redux-saga/effects'

import NavigationService from '../Services/NavigationService'
import { alertActions } from '../Stores/Messages/Actions'
/**
 * The startup saga is the place to define behavior to execute when the application starts.
 */
export function* startup() {
  // Dispatch a redux action using `put()`
  // @see https://redux-saga.js.org/docs/basics/DispatchingActions.html

  // Add more operations you need to do at startup here
  // ...
  yield put(alertActions.success('alo'))
  // When those operations are finished we redirect to the main screen
  NavigationService.navigateAndReset('SplashScreen')
}
