/* eslint-disable react-native/no-inline-styles */
import React, { useRef, useEffect, useState } from 'react'

import { Text, View } from 'react-native'
import LinearGradient from 'react-native-linear-gradient'
import styles from './SplashScreenStyle'
import LottieView from 'lottie-react-native'
import clockAnimation from '../../Assets/Animations/clock_animation/clock_animation.json'
import textAnimation from '../../Assets/Animations/clock_animation/cron_text_animation.json'

// import clockAnimation from '../../../android/app/src/main/assets/lottie/clock_animation/data.json'

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
        <LottieView source={clockAnimation} autoPlay loop style={{ width: '40%' }} />

        <AnimatedView ref={animationRef} style={{ flex: 80, flexDirection: 'column' }}>
        <LottieView source={textAnimation} autoPlay loop style={{ width: '100%' }} />
          
        </AnimatedView>
      </View>
    </LinearGradient>
  )
}
