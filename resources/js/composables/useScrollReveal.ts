import { onMounted, onUnmounted, type ComponentPublicInstance } from 'vue'

export function useScrollReveal() {
    const elements: Set<Element> = new Set()
    let observer: IntersectionObserver | null = null

    onMounted(() => {
        observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed')
                        observer?.unobserve(entry.target)
                        elements.delete(entry.target)
                    }
                })
            },
            { threshold: 0.15 },
        )

        elements.forEach((el) => observer?.observe(el))
    })

    onUnmounted(() => {
        observer?.disconnect()
    })

    function scrollRef(el: Element | ComponentPublicInstance | null) {
        if (!el) {
            return
        }
        const node = el instanceof Element ? el : (el.$el as unknown)
        if (node instanceof Element) {
            elements.add(node)
            observer?.observe(node)
        }
    }

    return { scrollRef }
}
