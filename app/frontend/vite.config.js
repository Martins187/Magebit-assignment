import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [vue()],
  resolve:{
      alias:{
          '@' : require('path').resolve(__dirname, 'src'),
          '@img' : require('path').resolve(__dirname, 'src/assets/images')
      },
  },
  server: {
    hmr: {
      protocol: 'ws',
      port: 3333,
    },
  }
})