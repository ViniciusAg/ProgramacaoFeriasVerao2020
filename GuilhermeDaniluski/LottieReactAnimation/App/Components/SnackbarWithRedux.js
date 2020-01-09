import React, { useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import {alertActions} from '../Stores/Messages/Actions'
import { Snackbar } from 'react-native-paper'
import { View } from 'react-native'

export default function SnackbarWithRedux() {
  const [visible, setVisible] = useState(false)
  const alert = useSelector(state => state.alert)
  const dispatch = useDispatch()

  return (
    <View>
      <Snackbar
        visible={visible}
        style={{
          backgroundColor: alert.backColor,
          color: alert.color,
        }}
        duration={Infinity}
        onDismiss={() => 
          {
            setVisible(false)
            alertActions.clear()
          }}
        action={{
          label: 'Fechar',
          onPress: () => {
            // Do something
          },
        }}
      >
        {alert.message}
      </Snackbar>
    </View>
  )
}
