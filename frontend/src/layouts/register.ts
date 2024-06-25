import { App } from 'vue'
import { Layouts } from '@/interfaces'
import DashboardLayout from './DashboardLayout.vue'
import DefaultLayout from './DefaultLayout.vue'
/**
 * Register Vue layouts in the app instance.
 *
 * @param {App<Element>} app - The Vue app instance.
 */
export function registerLayouts(app: App<Element>) {
  const layouts: Layouts = {
    DashboardLayout,
    DefaultLayout
  }

  const registeredComponents = new Set<string>()

  for (const layoutName in layouts) {
    const layoutComponent = layouts[layoutName]

    if (
      layoutComponent &&
      (layoutComponent.name === 'DashboardLayout' || layoutComponent.name === 'DefaultLayout') &&
      !registeredComponents.has(layoutComponent.name)
    ) {
      app.component(layoutName, layoutComponent)
      registeredComponents.add(layoutComponent.name)
    }
  }

  if (registeredComponents.size === 0) console.log('No layouts found')
}
