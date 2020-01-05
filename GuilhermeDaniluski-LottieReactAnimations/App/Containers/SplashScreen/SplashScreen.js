/* eslint-disable react-native/no-inline-styles */
import React, { useRef, useEffect, useState } from 'react'

import { Text, View } from 'react-native'
import LinearGradient from 'react-native-linear-gradient'
import styles from './SplashScreenStyle'
import LottieView from 'lottie-react-native'
import clockAnimation from '../../Assets/Animations/clock_animation/clock.json'
// import clockAnimation from '../../Assets/Animations/1633.json'

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
    <LinearGradient colors={['#A8A7A7', '#99B898', '#474747', '#363636']} style={styles.viewStyles}>
      <View style={{ flex: 1, flexDirection: 'column' }}>
        <View style={{ flex: 30 }}></View>

        <AnimatedView ref={animationRef} style={{ flex: 80, flexDirection: 'column' }}>
          <Text
            style={{
              textShadowRadius: 20,
              color: fontColor,
              fontSize: 20,
              width: '100%',
              textAlign: 'center',
            }}
          >
            The Clocker
          </Text>
          <LottieView source={clockAnimation} autoPlay loop />

        </AnimatedView>
      </View>
    </LinearGradient>
  )
}
