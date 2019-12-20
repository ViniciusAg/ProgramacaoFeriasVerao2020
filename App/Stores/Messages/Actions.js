import { alertConstants } from './Constants'

export const alertActions = {
  success,
  error,
  info,
  clear,
}

function success(message) {
  return { type: alertConstants.SUCCESS, message }
}

function error(message) {
  return (dispatch) => {
    return dispatch(result(message))
  }
  function result(message) {
    return { type: alertConstants.ERROR, message }
  }
}

function info(message) {
  return { type: alertConstants.INFO, message }
}


function clear() {
  return (dispatch) => {
    return dispatch(clear())
  }
  function clear() {
    return { type: alertConstants.CLEAR }
  }
}
