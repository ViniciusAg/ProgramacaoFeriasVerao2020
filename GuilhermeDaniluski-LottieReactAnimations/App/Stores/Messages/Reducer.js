import { alertConstants } from './Constants'

export function alert(state = {}, action) {
  switch (action.type) {
    case alertConstants.SUCCESS:
      return {
        type: 'alert-success',
        message: action.message,
        backColor: '#000',
        color: 'white',
      }
    case alertConstants.ERROR:
      return {
        type: 'alert-error',
        message: action.message,
      }
    case alertConstants.INFO:
      return {
        type: 'alert-info',
        message: action.message,
      }
    case alertConstants.LOADING:
      return {
        type: 'alert-loading',
        message: action.message,
      }
    case alertConstants.CLEAR:
      return {}
    default:
      return state
  }
}
