/* eslint-disable react-native/no-color-literals */
/* eslint-disable react-native/sort-styles */
import { StyleSheet } from 'react-native'
import Colors from '../../Theme/Colors'
import ApplicationStyles from '../../Theme/ApplicationStyles'

export default StyleSheet.create({
  container: {
    ...ApplicationStyles.screen.container,
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: Colors.primary,
  },
  logo: {
    height: '60%',
  },
  viewStyles: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: 'white',
  },
  textStyles: {
    color: '#00264d',
    fontSize: 30,
    fontWeight: 'bold',
  },
  textbottom: {
    color: '#233652',
    fontSize: 11,
    width: '100%',
    textAlign: 'center',
    fontWeight: 'bold',
    position: 'absolute',
    bottom: 5,
  },
})
