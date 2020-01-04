/* eslint-disable react-native/no-inline-styles */
import React, { useRef, useEffect, useState } from 'react'

import { Text, View } from 'react-native'
import styles from './SplashScreenStyle'
import LottieView from 'lottie-react-native'
import clockAnimation from '../../Assets/Animations/clock/clock_animation.json'
import { View as AnimatedView } from 'react-native-animatable'

const fontColor = '#fff'

export default function SplashScreen() {
  const [animationEnded, setAnimationEnded] = useState(false)
  const animationRef = useRef(true)

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

          <LottieView source={clockAnimation} autoPlay loop />
        </AnimatedView>
      </View>
    </View>
  )
}
