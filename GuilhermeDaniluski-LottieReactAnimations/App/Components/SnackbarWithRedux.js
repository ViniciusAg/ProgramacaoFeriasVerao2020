import React, { useState } from 'react'
import { connect } from 'react-redux'
import { Snackbar } from 'react-native-paper'
import { View } from 'react-native'

function SnackbarWithRedux({ alert }) {
  const [visible, setVisible] = useState(true)
  console.log(alert)

  return (
    <View>
      <Snackbar
        visible={visible}
        style={{
          backgroundColor: alert.backColor,
          color: alert.color,
        }}
        duration={Infinity}
        onDismiss={() => setVisible(false)}
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

const mapStateToProps = (store) => ({
  alert: store.alert,
})
export default connect(mapStateToProps)(SnackbarWithRedux)
