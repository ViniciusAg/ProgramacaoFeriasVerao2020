/* eslint-disable react-native/no-inline-styles */
import React, { useRef, useEffect, useState } from 'react'
import { useDispatch } from 'react-redux'
import { alertActions } from '../../Stores/Messages/Actions'

import { Text, View, Button } from 'react-native'
import styles from './SplashScreenStyle'
import { View as AnimatedView } from 'react-native-animatable'



const fontColor = '#353b4f'

export default function SplashScreen() {
  const [animationEnded, setAnimationEnded] = useState(false)
  const animationRef = useRef(true)
  const dispatch = useDispatch()

  useEffect(() => {
    if (animationRef) {
      _animate()
    }
  }, [animationRef])

  const _animate = async () => animationRef.current.fadeInUpBig(1500).then(setAnimationEnded(true))
  return (
    <View style={styles.viewStyles}>
      <View style={{ flex: 1, flexDirection: 'column' }}>
        <View style={{ flex: 30 }}></View>
        <AnimatedView ref={animationRef} style={{ flex: 50, flexDirection: 'column' }}>
          <Text
            style={{
              flex: 1,
              textShadowRadius: 20,
              color: fontColor,
              fontSize: 20,
              width: '100%',
              textAlign: 'center',
            }}
          >
            Testando Animações
          </Text>
        </AnimatedView>
        {animationEnded && (
          <View>
            <Button title="teste" onPress={() => {dispatch(alertActions.success('alo'))}}>
              teste
            </Button>
          </View>
        )}
        <View style={{ flex: 20 }}>
          <Text style={styles.textbottom}>
            Testing animations, no rights reserved.
          </Text>
        </View>
      </View>
    </View>
  )
}
